<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
<style>
    table{
        border:1px solid #ddd;
    }
</style>    
 
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Laravel HTML to PDF Example</h2>
       

        <table >
            <thead>
                <tr class="table-danger">
                    <th scope="col">SL</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
            @foreach($search_data as $d)
                <tr>
                    <td>{{$d->trans_date}}</td>
                </tr>
			@endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>