@extends('layout')

@section('content')
    <div class="container">
        <div class="col-md-5">
            <div class="form-area">
                <form role="form" method="POST" action="{{url('/articles/store')}}">
                    <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Create Article</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="I am the title">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="textarea" id="body" placeholder="Body" maxlength="140" rows="7">I am the body.</textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>
                    </div>
                    <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
