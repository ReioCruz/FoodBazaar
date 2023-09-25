<?php include('partials/menu.php');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php $month = isset($_GET['month']) ? $_GET['month'] : date("Y-m"); ?>
<div class="content py-3">
    <div class="card card-outline card-navy shadow rounded-0">
        <div class="card-header">
            <h3 class="text-center card-title">Monthly Order Reports</h3>
        </div>
  
        <div class="card-body">
            <div class="container-fluid">
                <div class="callout callout-primary shadow rounded-0">
                    <form action="" id="filter">
                        <div class="row align-items-end">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="month" class="control-label">Month</label>
                                    <input type="month" name="month" id="month" value="<?= $month ?>" class="form-control rounded-0" required>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-flat btn-sm"><i class="fa fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
  
                    <div class="clear-fix mb-3"></div>
                    <div id="outprint">
                    <table class="table table-bordered table-stripped">
                        <colgroup>
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                            <col width="1%">
                        </colgroup>
                        <thead>
                            <tr class="">
                                <th class="text-center align-middle py-1">#</th>
                                <th class="text-center align-middle py-1">Orde Date</th>
                                <th class="text-center align-middle py-1">Vendor</th>
                                <th class="text-center align-middle py-1">Ref. Code</th>
                                <th class="text-center align-middle py-1">Total Amount</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php 
                            $i = 1;
                            $total = 0;
                            $orders = $conn->query("SELECT user_id, vendor_id, code, order_date, total FROM order_list where date_format(order_date,'%Y-%m') = '{$month}' order by unix_timestamp(order_date) desc ");
                            while($row = mysqli_fetch_array($orders)){
                                $total += $row['total'];
                            ?>
                                <tr>
                                    <td class="text-center align-middle px-2 py-1"><?php echo $i++; ?></td>
                                    <td class="text-center align-middle px-2 py-1"><?php echo $row['vendor_id'] ?></td>
                                    <td class="text-center align-middle px-2 py-1"><?php echo date("Y-m-d",strtotime($row['order_date'])) ?></td>
                                    <td class="text-center align-middle px-2 py-1"><?= $row['code'] ?></td>
                                
                                    <td class="text-center align-middle px-2 py-1"><?php echo ($row['total']) ?></td>
                                </tr>
                            <?php }; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th class="text-left px-1">Total : </th>
                                <th class="text-left px-1"><?= ($total) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
<style>
    #sys_logo{
        width:5em !important;
        height:5em !important;
        object-fit:scale-down !important;
        object-position:center center !important;
    }
</style>
<div class="d-flex align-items-center">
    <div class="col-auto text-center pl-4">
        <img src="<?= validate_image($_settings->info('logo')) ?>" alt=" System Logo" id="sys_logo" class="img-circle border border-dark">
    </div>
    <div class="col-auto flex-shrink-1 flex-grow-1 px-4">
        <h4 class="text-center m-0"><?= $_settings->info('name') ?></h4>
        <h3 class="text-center m-0"><b>Order Report</b></h3>
        <h5 class="text-center m-0">For the Month of</h5>
        <h5 class="text-center m-0"><?= date("F Y", strtotime($month)) ?></h5>
    </div>
</div>
<hr>
</noscript>
<script>
    $(function(){
        $('#filter').submit(function(e){
            e.preventDefault()
            location.href = "./?page=reports/order_reports&"+$(this).serialize();
        })
        $('#print').click(function(){
            start_loader();
            var head = $('head').clone()
            var p = $('#outprint').clone()
            var el = $('<div>')
            var header =  $($('noscript#print-header').html()).clone()
            head.find('title').text("Orders Montly Report - Print View")
            el.append(head)
            el.append(header)
            el.append(p)
            var nw = window.open("","_blank","width=1000,height=900,top=50,left=75")
                    nw.document.write(el.html())
                    nw.document.close()
                    setTimeout(() => {
                        nw.print()
                        setTimeout(() => {
                            nw.close()
                            end_loader()
                        }, 200);
                    }, 500);
        })
    })
</script>