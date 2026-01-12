<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? $title . ' - ' : ''; ?>Car Booking WANG-SMU</title>
    
    <!-- Bootstrap 3 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 70px;
            background-color: #f5f5f5;
        }
        .main-container {
            margin-bottom: 50px;
        }
        .page-header {
            margin-top: 0;
            border-bottom: 2px solid #337ab7;
        }
        .btn-action {
            margin: 0 2px;
        }
        .table-responsive {
            margin-top: 20px;
        }
        .alert {
            margin-top: 20px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 3px;
            font-weight: bold;
        }
        /* Booking status styles */
        .status-pending { background-color: #f0ad4e; color: white; }  /* Orange */
        .status-active { background-color: #5cb85c; color: white; }   /* Green */
        .status-complete { background-color: #337ab7; color: white; } /* Blue */
        
        /* Car status styles */
        .status-available { background-color: #5cb85c; color: white; }
        .status-maintenance { background-color: #f0ad4e; color: white; }
        .status-inactive { background-color: #777; color: white; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" style="cursor: default;">Car Booking WANG-SMU</span>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo base_url('cars'); ?>"><span class="glyphicon glyphicon-road"></span> Mobil</a></li>
                    <li><a href="<?php echo base_url('booking'); ?>"><span class="glyphicon glyphicon-calendar"></span> Booking</a></li>
                    <li><a href="<?php echo base_url('booking/create'); ?>"><span class="glyphicon glyphicon-plus"></span> Buat Booking</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-container">
