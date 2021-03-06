@section('title','Confirmation de compte')
<!DOCTYPE html>
<html lang="en">
 @include('layout.client.partials.head')
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
              <div class="col-lg-4 mx-auto">
                <div class="auto-form-wrapper">
                    <h4 class="text-center"> Ressaisissez votre adresse mail </h4>
                  <form action="{{ route('action_confirm_account') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" placeholder="Ressaisir votre adresse mail" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                            </div>
                        </div>
                        @error('email')
                            <div style="color: red;"> {{ $message }} </div>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                      <button class="btn btn-primary submit-btn btn-block"> Verification </button>
                    </div>
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <script src="//code.jquery.com/jquery.js"></script>
  @include('flashy::message')

    @include('layout.client.partials.scriptjs')
  </body>
 

</html>