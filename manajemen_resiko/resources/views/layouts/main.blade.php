<!doctype html>
<html lang="en">
  <head>
  	<title>Monitoring Risk</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     --}}
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </head>

  <style>
            body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            overflow: auto; /* prevent scrollbar flash */
        }
        .parent-container {
    overflow: auto;
}
        .container {
            overflow-y: auto; /* atau overflow: scroll; */
        }
        .table-container {
    height: 300px; /* Atur ketinggian sesuai kebutuhan */
    overflow: auto;
}
        #wrapper {
            display: flex;
        }

        #sidebar {
            width: 250px;
            background-color: #015eb6;
            color: white;
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
        }
        #sidebar::-webkit-scrollbar {
            width: 6px; /* Lebar scrollbar */
        }

        #sidebar::-webkit-scrollbar-thumb {
            background-color: transparent; /* Warna thumb scrollbar (anda dapat mengganti dengan warna yang diinginkan) */
        }

        #content {
            flex: 1;
            padding: 16px;
        }

        .sidebar-header {
            padding: 20px;
            text-align: center;
            background-color: #015eb6;
            margin-bottom: 30px
        }

        .sidebar-header h3 {
            color: white;
            font-size: 24px;
            margin-bottom: 0;
        }

        .nav-link {
            text-decoration: none;
            color: white;
            padding: 10px;
            display: block;
            margin-bottom: 5px;
            /* padding-left: 10px; */
        }

        .active{
            background-color: #15528e;
        }

        .navbar-nav .active:hover{
            background-color: #125497;
            color: white;
        }

        .nav-item .active:hover{
            background-color: #0c4176;
            color: white;
        }

        .nav-item:hover{
            background-color: #15528e;
            color: white;
        }

       .navbar-nav a:hover {
            color: white; /* Set the same color or a different color for the hover state */
        }

        .navbar-nav .nav-item{
            margin-bottom: 5px;
            padding-left: 20px;
        }

        /* .nav-link:hover {
            background-color: #3b84c9;
        } */

        .content-header {
            padding: 20px;
            background-color: #015eb6;
            color: white;
        }

        table {
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #111;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .fas{
            padding-right: 20px;
        }
  </style>
  <body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <h3>Monitoring Risk</h3>
            </div>
            <ul class="navbar-nav">
                <li class="nav-item <?php echo ($activePage == 'dashboard') ? 'active' : ''; ?>">
                    <a href="{{ route('dashboard.show') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'monitoring') ? 'active' : ''; ?>">
                    <a href="{{ route('monitoring.show') }}" class="nav-link"><i class="fas fa-chart-line"></i> Monitoring</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'assessment') ? 'active' : ''; ?>">
                    <a href="{{ route('assessment.show') }}" class="nav-link"><i class="fas fa-clipboard-check"></i> Risk Assessment</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'recommendation') ? 'active' : ''; ?>">
                    <a href="{{ route('recommendation.show') }}" class="nav-link"><i class="fas fa-lightbulb"></i> Recommendation</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'activity') ? 'active' : ''; ?>">
                    <a href="{{ route('activity.show') }}" class="nav-link"><i class="fas fa-tasks"></i> Activity</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'department') ? 'active' : ''; ?>">
                    <a href="{{ route('department.show') }}" class="nav-link"><i class="fas fa-sitemap"></i> Department</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'risk') ? 'active' : ''; ?>">
                    <a href="{{ route('risk.show') }}" class="nav-link"><i class="fas fa-exclamation-triangle"></i> Risk</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'riskvalue') ? 'active' : ''; ?>">
                    <a href="{{ route('riskvalue.show') }}" class="nav-link"><i class="fas fa-balance-scale"></i> Risk Value</a>
                </li>
                <li class="nav-item <?php echo ($activePage == 'user') ? 'active' : ''; ?>">
                    <a href="{{ route('user.show') }}" class="nav-link"><i class="fas fa-user"></i> User</a>
                </li>
            </ul>
            
        </div>

    {{-- <main class="container"> --}}
        @yield('content')
    {{-- </main> --}}

    
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    
        // $(document).ready(function() {
        //     // Event listener untuk perubahan pada select activity
        //     $('#activitySelect').change(function() {
        //         updateDampakCheckboxes();
        //     });
    
        //     // Fungsi untuk memperbarui checkbox dampak berdasarkan nilai risiko yang dipilih
        //     function updateDampakCheckboxes() {
        //         var selectedActivity = $('#activitySelect').val();
    
        //         // Kirim request AJAX untuk mendapatkan dampak berdasarkan nilai risiko dan activity
        //         $.ajax({
        //             url: '{{ route("assessment.get-dampak") }}',
        //             type: 'POST',
        //             data: {
        //                 _token: '{{ csrf_token() }}',
        //                 activity_id: selectedActivity
        //             },
        //             success: function(response) {
        //                 // Tampilkan checkbox dampak yang baru
        //                 $('#dampakContainer').html(response);
        //             },
        //             error: function(error) {
        //                 // console.log(error);
        //             }
        //         });
        //     }
    
        //     // Panggil fungsi pertama kali halaman dimuat
        //     updateDampakCheckboxes();
        // });

        function getImpacts() {
            var activityId = $('#activity_id').val();

            $.ajax({
                url: "{{ route('assessment.get-dampak') }}",
                method: 'GET',
                data: {
                    activity_id: activityId,
                },
                success: function(response) {
                    var impactsList = '';

                    $.each(response.impacts, function(index, impact) {
                        impactsList += '<input type="checkbox" name="impact_ids[]" value="' + impact.id + '">' + '&nbsp' + impact.nama_dampak + '<br>';
                    });

                    $('#impacts-list').html(impactsList);
                },
            });
        }
    </script>

</body>
</html>
