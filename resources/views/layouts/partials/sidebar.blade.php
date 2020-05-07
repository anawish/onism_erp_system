<div class="col-sm-3" id="topheader">
	<nav id="sidebar">
    <div class="sidebar-sticky">
      <ul class="nav  flex-column">
      	  <li class="{{'dashboard' == request()->path() ?'active':''}} side_bar" style="margin-bottom: -27px;">
            <a class="nav-link" href="{{url('/dashboard')}}">
              <span data-feather="file" class="sidebar-img">
                <img src="{{asset('image/finance.png')}}"></span>
              Dashboard <span class="sr-only"></span>
            </a>
        	</li>
        	<li class="nav-item side_bar {{'account' == request()->path() ?'active':'account/create' == request()->path() ?'active':'account/viewcustomer' == request()->path() ?'active':'generaledger' == request()->path() ?'active':''}}">
            <a class="nav-link" href="{{url('/account')}}">
              <span data-feather="file" class="sidebar-img">
                <img src="{{asset('image/finance.png')}}">
              </span>
              Accounts <span class="sr-only"></span>
            </a>
        	</li>
        	<li class="{{'crm' == request()->path() ?'active':'client' == request()->path() ?'active':'client/create' == request()->path() ?'active':'clientgroup' == request()->path() ?'active':''}} side_bar mt-27">
          	<a class="nav-link" href="{{url('/crm')}}">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/crm.png')}}"></span>
            		CRM
          	</a>
        	</li>
         	<li class="{{'sale' == request()->path() ?'active': 'newinvoice' == request()->path() ?'active':'managesaleinvoice' == request()->path() ?'active':'newinvoice' == request()->path() ?'active':'createqouta' == request()->path() ?'active':'qoute' == request()->path() ?'active':'customer' == request()->path() ?'active':'order' == request()->path() ?'active':'order/create' == request()->path() ?'active':''}} side_bar mt-27 ">
          	<a class="nav-link" href="{{url('/sale')}}">
            		<span data-feather="file" class="sidebar-img">
                  <img src="{{asset('image/sales.png')}}"></span>
           		Sales<span class="sr-only"></span>
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img">
                  <img src="{{asset('image/pm.png')}}"></span>
           		Project Management
          	</a>
        	</li>
       	<li class="{{'purchase' == request()->path() ?'active' : 'purchaseorder' == request()->path() ?'active':'managepurchase' == request()->path() ?'active': 'supplier' == request()->path() ?'active':'suppliers/create' == request()->path() ?'active':'suppliers' == request()->path() ?'active':''}} side_bar mt-27">
          	<a class="nav-link" href="{{url('/purchase')}}">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/purchase.png')}}"></span>
            		Purchasings
          	</a>
        	</li>
        	<li class="{{'inventory' == request()->path() ?'active': 'product' == request()->path() ?'active': 'products' == request()->path() ?'active':'productcategory' == request()->path() ?'active': 'addprocategory' == request()->path() ?'active': 'warehouse' == request()->path() ?'active':'createwarehouse' == request()->path() ?'active': 'stockreturn' == request()->path() ?'active': 'addsupplier' == request()->path() ?'active': 'viewstock' == request()->path() ?'active':'grn' == request()->path() ?'active':'grn/create' == request()->path() ?'active':''}} side_bar mt-27">
          	<a class="nav-link" href="{{url('/inventory')}}">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/inventory.png')}}"></span>
            		Inventory
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/cs.png')}}"></span>
            		Customer Services
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/production.png')}}"></span>
            		Production
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/human-resources.png')}}"></span>
            		Human Resources
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/ofc.png')}}"></span>
            		Office Management
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/Reports.png')}}"></span>
            		Executive Reports
          	</a>
        	</li>
        	<li class="nav-item side_bar mt-27">
          	<a class="nav-link" href="#">
            		<span data-feather="file" class="sidebar-img"><img src="{{asset('image/sm.png')}}"></span>
            		System Management
          	</a>
        	</li>
      </ul>
		</div>
  </nav>
</div>
<script type="text/javascript">


</script>
