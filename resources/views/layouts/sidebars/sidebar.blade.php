

      @if(Gate::check('isAdmin') || Gate::check('isSchoolOfScience') || Gate::check('isSchoolOfArts') || Gate::check('isSchoolOfTourism') || Gate::check('isSchoolOfBusiness') || Gate::check('isSchoolOfEducation'))
 <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="{{ url('/dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
          </li>
         @can('isAdmin')
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Manage Posts</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">

              <li><a class="" href="{{route('getManagePosts')}}">Create Post </a></li>
                <li><a class="" href="{{route('adminview')}}">View Post </a></li>
                  <li><a class="" href="{{route('mngInfo')}}">Management List</a></li>
                    <li><a class="" href="{{route('getStudentListMultiClass')}}">Student Multi List</a></li>

            </ul>

          </li>
          @endcan
          <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Manage All</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              @can('isAdmin')

              <li><a class="" href="{{route('getApplicantReport')}}">Applicants List </a></li>
                <li><a class="" href="{{route('admincandidate')}}">Qualified Candidates</a></li>
                <li><a class="" href="{{route('showschoolofscience')}}">School Of Science</a></li>
                    <li><a class="" href="{{route('showschoolofEducation')}}">School Of Education</a></li>
                    <li><a class="" href="{{route('showschoolofArts')}}">School Of Arts</a></li>
                    <li><a class="" href="{{route('showschoolofTourism')}}">School Of Tourism and Nat.</a></li>
                  @endcan
                @can('isSchoolOfScience')
                    <li><a class="" href="{{route('showschoolofscience')}}">School Of Science</a></li>
                    @endcan
                      @can('isSchoolOfEducation')
                        <li><a class="" href="{{route('showschoolofEducation')}}">School Of Education</a></li>
                        @endcan



            </ul>

          </li> -->


        {{-------------------------------------FINANCE PAYMENT CONFIRMATION-----------------------------}}
          <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Payement</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
                <li><a class="" href="{{route('science')}}">School of Science</a></li>


            </ul>
          </li> -->
{{---------------------------------------------------------------------------------------------}}
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Admissions</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
                <li><a class="" href="{{url('applicants')}}">All Applicants</a></li>


            </ul>
          </li>

        {{---------------------------------------------------------------------------------------------}}
        {{---------------------------------------------------------------------------------------------}}
                  <li class="sub-menu">
                    <a href="javascript:;" class="">
                                  <i class="icon_document_alt"></i>
                                  <span>Manage</span>
                                  <span class="menu-arrow arrow_carrot-right"></span>
                              </a>
                    <ul class="sub">
                        <li><a class="" href="{{url('course')}}">New Course</a></li>
                        <li><a class="" href="{{url('campus')}}">New Campus</a></li>
                        <li><a class="" href="{{url('course')}}">All Courses</a></li>


                    </ul>
                  </li>

                {{---------------------------------------------------------------------------------------------}}





          <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Reports</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="{{route('getManagePosts')}}">Posts </a></li>
                <li><a class="" href="{{route('adminview')}}">View Post </a></li>
               <li><a class="" href="{{route('getApplicantReport')}}">All Applicants</a></li>
                <li><a class="" href="{{route('userInfo')}}">Users List</a></li>
                  <li><a class="" href="{{route('science')}}">Science</a></li>
                  <li><a class="" href="{{route('adminhome')}}">Management</a></li>
            </ul>

          </li> -->

           <!-- <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Letters</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              @if(Gate::check('isSchoolOfScience'))
              <li><a class="" href="{{url('getD')}}">Personal Files</a></li>
                <li><a class="" href="{{url('getDownload')}}">Qualification Files</a></li>
              @endif
                @if(Gate::check('isSchoolOfEducation'))
                <li><a class="" href="{{url('getSchoolOfEducation')}}">School of Education</a></li>
                @endif
                @if(Gate::check('isSchoolOfTourism'))
                <li><a class="" href="#">School of Tourism</a></li>
                @endif
                @if(Gate::check('isSchoolOfArts'))
                <li><a class="" href="#">School of Arts</a></li>
                @endif

                @if(Gate::check('isSchoolOfBusiness'))
                  <li><a class="" href="#">School of Business</a></li>
                @endif

            </ul>
          </li>


          <!-- <li>
            <a class="" href="#">
                          <i class="icon_genius"></i>
                          <span>Appointment Letter</span>
                      </a>
          </li> -->
          <li>
            <a class="" href="{{route('getRegisteredUser')}}">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

          </li>





        </ul>
        <!-- sidebar menu end-->


      </div>
    </aside>
    @endif


    <!--sidebar end-->
