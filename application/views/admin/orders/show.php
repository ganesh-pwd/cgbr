<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Products
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header">
                        Order Details
                    </div>
                    <?php echo form_open(base_url('index.php/admin/categories/edit/'.$this->uri->segment(4))) ?>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Id</th>
                                <td><?php echo xss_clean($record[0]->id) ?></td>
                            </tr>
                            <tr>
                                <th>User</th>
                                <td><?php echo xss_clean($record[0]->user_name) ?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?php echo xss_clean($record[0]->email) ?></td>
                            </tr>
                            <tr>
                                <th>Billing Address</th>
                                <td><?php 
                                if(is_serialized($record[0]->billing_address)){    
                                $billing_address =  unserialize($record[0]->billing_address);
                                 ?>
                                <label>Fisrt Name : </label> <span><?php echo xss_clean($billing_address['billing_first_name']); ?></span><br/>
                                <label>Last Name : </label> <span><?php echo xss_clean($billing_address['billing_last_name']); ?></span><br/>
                                <label>Company : </label> <span><?php echo xss_clean($billing_address['billing_company']); ?></span><br/>
                                <label>Country : </label> <span><?php echo xss_clean($billing_address['billing_country']); ?></span><br/>
                                <label>Street : </label> <span><?php echo xss_clean($billing_address['billing_street_addr_1']); ?></span><br/>
                                <label></label> <span><?php echo xss_clean($billing_address['billing_street_addr_2']); ?></span><br/>
                                <label>City : </label> <span><?php echo xss_clean($billing_address['billing_city']); ?></span><br/>
                                <label>State : </label> <span><?php echo xss_clean($billing_address['billing_state']); ?></span><br/>
                                <label>Zip : </label> <span><?php echo xss_clean($billing_address['billing_zip']); ?></span><br/>
                                <label>Phone : </label> <span><?php echo xss_clean($billing_address['billing_phone']); ?></span><br/>
                                <label>E-mail : </label> <span><?php echo xss_clean($billing_address['billing_email']); ?></span>
                            <?php } ?>
                                 </td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>
                                    <?php 
                                if(is_serialized($record[0]->delivery_address)){    
                                   
                                $delivery_address =  unserialize($record[0]->delivery_address);
                                 ?>
                                <label>Fisrt Name : </label> <span><?php echo xss_clean($delivery_address['delivery_first_name']); ?></span><br/>
                                <label>Last Name : </label> <span><?php echo xss_clean($delivery_address['delivery_last_name']); ?></span><br/>
                                <label>Company : </label> <span><?php echo xss_clean($delivery_address['delivery_company']); ?></span><br/>
                                <label>Country : </label> <span><?php echo xss_clean($delivery_address['delivery_country']); ?></span><br/>
                                <label>Street : </label> <span><?php echo xss_clean($delivery_address['delivery_street_addr_1']); ?></span><br/>
                                <label></label> <span><?php echo xss_clean($delivery_address['delivery_street_addr_2']); ?></span><br/>
                                <label>City : </label> <span><?php echo xss_clean($delivery_address['delivery_city']); ?></span><br/>
                                <label>State : </label> <span><?php echo xss_clean($delivery_address['delivery_state']); ?></span><br/>
                                <label>Zip : </label> <span><?php echo xss_clean($delivery_address['delivery_zip']); ?></span><br/>
                                <label>Phone : </label> <span><?php echo xss_clean($delivery_address['delivery_phone']); ?></span><br/>
                                <label>E-mail : </label> <span><?php echo xss_clean($delivery_address['delivery_email']); ?></span>
                            <?php } ?>
                                </td>
                            </tr>
                             <tr>
                                <th>Total Amount</th>
                                <td><?php echo "€ ".xss_clean($record[0]->total_amt) ?></td>
                            </tr>
                            <tr>
                                <table class="table table-bordered">
                                    <th>Product Id</th><th>Product Name</th><th>Qty</th><th>Attributes</th>
                                    <?php
                                    foreach ($record as $key => $value) { ?>
                                         <tr>
                                                <td><?php echo xss_clean($value->product_id) ?></td>
                                                <td><?php echo xss_clean($value->product_name) ?></td>
                                                <td><?php echo xss_clean($value->qty) ?></td>
                                                <td><?php if($value->attributes != ''){ 
                                                    $attr = unserialize($value->attributes); 
                                                    foreach ($attr as $key => $value) {
                                                       $label = str_replace('_', ' ', $key);
                                                       $label = strtoupper($label); 
                                                       echo '<label>'.$label.':</label>';
                                                       echo '<span>'.$value.'</span><br/>';
                                                    }
                                                }
                                                 ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </table> 
                            </tr>

                            


                            </tbody>
                        </table>

                    </div>
                    <?php echo form_close() ?>

                </div>

            </div>
        </div>
    </section>
</div>


<?php

function is_serialized($value, &$result = null)
{
    // Bit of a give away this one
    if (!is_string($value))
    {
        return false;
    }

    // Serialized false, return true. unserialize() returns false on an
    // invalid string or it could return false if the string is serialized
    // false, eliminate that possibility.
    if ($value === 'b:0;')
    {
        $result = false;
        return true;
    }

    $length = strlen($value);
    $end    = '';

    switch ($value[0])
    {
        case 's':
            if ($value[$length - 2] !== '"')
            {
                return false;
            }
        case 'b':
        case 'i':
        case 'd':
            // This looks odd but it is quicker than isset()ing
            $end .= ';';
        case 'a':
        case 'O':
            $end .= '}';

            if ($value[1] !== ':')
            {
                return false;
            }

            switch ($value[2])
            {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                case 8:
                case 9:
                break;

                default:
                    return false;
            }
        case 'N':
            $end .= ';';

            if ($value[$length - 1] !== $end[0])
            {
                return false;
            }
        break;

        default:
            return false;
    }

    if (($result = @unserialize($value)) === false)
    {
        $result = null;
        return false;
    }
    return true;
}
