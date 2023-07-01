<!DOCTYPE html>
<html>

<head>
    <title>Export PDF</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MEKJ86H9RN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MEKJ86H9RN');
</script>

<body>
    <br />
    <div class="container">
        <h1 align="center">Export PDF</h1><br />
 
        <div class="row">
            <div class="col-md-7" align="right">
                <h4> <b>Customer Data </b></h4>
            </div>
            <div class="col-md-5" align="right">
                <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Export into PDF</a>
            </div>
        </div>
        <br />
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>email</th>
                        <th>joining_date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer_data as $customer => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->first_name }}</td>
                        <td>{{ $value->last_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->joining_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>