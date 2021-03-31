<html>
<head>
    <title>Report Page</title>
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <style>
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            table td, table thead{
                border: 1px solid #ddd;
                padding: 8px;
            }
            table tr:nth-child(even){
                background-color: aqua;
            }
            table thead{
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: center;
                background-color: #4CAF50;
                color: #fff;
            }
        </style>
</head>
    <body>
        @if(session()->has('opt4'))
        <br>
            <h1 class="text-white bg-dark text-center">
                User's Count
            </h1>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Total Admin</td>
                        <td>:</td>
                        <td>{{$countsOf['admin']}}</td>
                    </tr>
                    <tr>
                        <td>Total Personal User</td>
                        <td>:</td>
                        <td>{{$countsOf['personal']}}</td>
                    </tr>
                    <tr>
                        <td>Total Organizational User</td>
                        <td>:</td>
                        <td>{{$countsOf['orgranization']}}</td>
                    </tr>
                    <tr>
                        <td>Total Volunteer</td>
                        <td>:</td>
                        <td>{{$countsOf['volunteer']}}</td>
                    </tr>
                </tbody>
            </table>
        @endif

        @if(session()->has('repo1'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Registered User Report
        </h1><br>
                <table class="table">
                    <thead>
                        <tr>
                            <td>User ID</td>
                            <td>User Name</td>
                            <td>Campaign Id</td>
                            <td>Donated Amount</td>
                            <td>Donated Date</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($userReports as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->cid}}</td>
                                    <td>{{$user->amount}}</td>
                                    <td>{{$user->date}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif

        @if(session()->has('repo2'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Top 10 Donation of the Site
        </h1><br>
                <table>
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Campaign Id</td>
                            <td>Donated Amount</td>
                            <td>Donated Date</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($CampaignReports as $donation)
                                <tr>
                                    <td>{{$donation->username}}</td>
                                    <td>{{$donation->email}}</td>
                                    <td>{{$donation->cid}}</td>
                                    <td>{{$donation->amount}}</td>
                                    <td>{{$donation->date}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif

        @if(session()->has('opt3'))
        <br>
        <h1 class="text-white bg-dark text-center">
        Donation's Over {{session('do')}}
        </h1><br>
                <table>
                    <thead>
                        <tr>
                            <td>User Name</td>
                            <td>Campaing Title</td>
                            <td>Donation Amount</td>
                            <td>Donated Date</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($donationsOver as $donation)
                                <tr>
                                    <td>{{$donation['username']}}</td>
                                    <td>{{$donation['title']}}</td>
                                    <td>{{$donation['amount']}}</td>
                                    <td>{{$donation['donationDate']}}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
        @endif
        <br>
    </body>
</html>