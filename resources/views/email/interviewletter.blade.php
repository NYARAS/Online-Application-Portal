
<style type="text/css">
    .avatar{
        border-radius: 100px;
        max-width: 100px;
    }
      .panel-green > .panel-heading {
        border-color: #5cb85c;
        color: green;
    }

.panel-green {
    border-color: red;
}
            }
.form-group.required .control-label:after {
    color: #ff0000;
    content: "*";

}
.control-label{
    color: green;
}
.lead{
    font-weight: bold;
}

</style>
<div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">Interview Letter</div>
                <hr>

                <table>
                  <tr>
                    <th>ApplicantID</th><td>{{$user->applicant_id}}</td>

                  </tr>
                   <tr>
                    <th>Name</th><td><u>{{$user->name}}</u></td>

                  </tr>
                   <tr>
                    <th>email</th><td><u>{{$user->email}}</u></td>

                  </tr>
                </table>
                <hr>

                    @foreach($letters as $key =>$letter)
                  <p style="font-family: Poppins;">Following your application as a <b>{{$letter->job_title}}</b> in the <b>{{$letter->school}}</b> in Maasai Mara University, the university is pleased to inform you that you have been selected to appear for the interview on <b>31/7/2015</b></p>


                    @endforeach

                </table>
</div>
</div>
</div>
</div>
