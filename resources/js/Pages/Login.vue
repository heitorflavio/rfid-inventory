<template>
    <div class="bg-gradient-primary" id="login">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
              <div class="card-body p-0">
                <div class="row">
                  <div class="col-lg-6 d-none d-lg-flex">
                    <div
                      class="flex-grow-1 bg-login-image"
                    >
                    <img src="assets/img/dogs/stock.jpg" class="img-fluid" alt="Imagem">
                  </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="p-5">
                      <div class="text-center">
                        <h4 class="text-dark mb-4">BEM-VINDO</h4>
                      </div>
                      <form class="user" action="/login" method="post">
                        <div class="mb-3">
                          <input
                            class="form-control form-control-user"
                            type="email"
                            id="exampleInputEmail"
                            aria-describedby="emailHelp"
                            placeholder="Enter Email Address..."
                            name="email"
                          />
                        </div>
                        <div class="mb-3">
                          <input
                            class="form-control form-control-user"
                            type="password"
                            id="exampleInputPassword"
                            placeholder="Password"
                            name="password"
                          />
                        </div>
                        <button
                          class="btn btn-primary d-block btn-user w-100"
                          type="submit"
                        >
                          Login
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {};
  </script>
  
  <style scoped>
  #login {
    height: 100vh;
  }
  img{
    height: 80vh;
    width: 100%;
  }
 
  </style>