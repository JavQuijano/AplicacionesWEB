<html>
<head>
    <title>Mapa FMAT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="JS/Invitacion.js"></script>
    <link rel="stylesheet" href="./Estilos/invitacion.css" type="text/css"/>
</head>

<body>
<div class="bg">
    <div class="card">
        <div class="title">Invite New User</div>
        <form class='form'>
            <div class="h2">User Information</div>
            <input type="text" name="name" placeholder='Name' class="float-label" required>
            <input type="text" name="email address" placeholder='Email Address' class="float-label" required>
            <input type="text" name="position title" placeholder='Position Title' class="float-label" required>
            <div class="permissions">
                <div class="h2">User Permissions</div>
                <div class="col-1">
                    <div class="permission-group">
                        <input type="checkbox" name="" value="" checked>
                            <span class="icon-PieChart"></span>
                        <span class="permission-detail">
                            User can access reports and data
                            <span class="help">(Given to all users)</span>
                        </span>
                    </div>
                    <div class="permission-group">
                        <input type="checkbox" name="" value="">
                            <span class="icon icon-ManageUsers"></span>
                        <span class="permission-detail">
                            User can add/manage users and edit permissions
                        </span>
                    </div>
                    <div class="permission-group">
                        <input type="checkbox" name="" value="">
                        <span class="icon icon-uniE900"></span>
                        <span class="permission-detail">
                            User can access revenue reports
                        </span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="permission-group">
                        <input type="checkbox" name="" value="">
                        <span class="icon icon-Publish"></span>
                        <span class="permission-detail">
                            User can publish to social media accounts
                            <span class="help">(i.e. Twitter & Facebook)</span>
                        </span>
                    </div>
                    <div class="permission-group">
                        <input type="checkbox" name="" value="">
                        <span class="icon user-surveys icon-SurveysAdmin"></span>
                        <span class="permission-detail">
                            User is an account administrator
                        </span>
                    </div>
                </div>
            </div>
        </form>
        <div class="button">Send Invite</div>
    </div>
</div>
</body>
</html>
