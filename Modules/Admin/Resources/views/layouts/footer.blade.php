<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by
             <a href="http://ahmadsaugi.com">A. Saugi</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{asset('js/admin/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>
    
<script src="{{asset('js/admin/apexcharts.js')}}"></script>
<script src="{{asset('js/admin/dashboard.js')}}"></script>

<script src="{{asset('js/admin/mazer.js')}}"></script>
 
    
<script src="{{asset('js/admin/simple-datatables.js')}}"></script>
<script>
    // Simple Datatable
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>

    <script src="{{asset('js/admin/mazer.js')}}"></script>

     @section('addscript')
    @show
</body>
</html>