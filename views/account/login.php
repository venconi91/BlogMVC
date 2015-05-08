<!--<h1>Login</h1>
<form action="/account/login" method="POST">
    Username <input type="text" name="username">
    Password <input type="text" name="password">
    <input type="submit" value="login">
    <a href="/account/register">register</a>
</form>-->

<div class="container container-with-margin-top">
    <div class="row">
        <div class="col-md-7">
            <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="/account/login">
                    <fieldset>
                        <legend>Login</legend>
                        <div class="form-group">
                            <label for="username" class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" name ="username" class="form-control" id="username" placeholder="Username"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" name ="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">&lt; &gt;</div>
            </div>
        </div>
    </div>
</div>