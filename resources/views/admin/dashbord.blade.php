@include('admin.header')
      
<!-- partial:partials/_sidebar.html -->
@include('admin.sidebar')
<!-- partial:partials/_sidebar.html -->
<!---- navbar strat --->
@include('admin.navbar.navbar')
<!----- navbar end ---->

<!--- main panel strat--->
@include('admin.body');
<!-- main-panel ends -->
        
<!--- footer --->
@include('admin.footer')