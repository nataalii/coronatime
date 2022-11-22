@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="en">
<body>
    <img src="/images/coronatime.svg" alt="coronatime-image" class="absolute mx-24 mt-9">
    <div class="flex h-full">
        <div class="flex flex-1 flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24 h-full mr-96">
          <div class="mx-auto w-full">
            <div>
              <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">{{ __('Welcome to Coronatime') }}</h2>
              <h3 class="text-xl text-dark/60 mt-4">{{ __('Please enter required info to sign up') }}</h3>
            </div>
            <div class="mt-8">
                <form  method="POST" action="{{ route('registration.store') }}" class="space-y-6 w-500px">
                  @csrf
                  <div class="space-y-1">
                    <label for="username" class="block text-xs font-bold text-dark/100">{{ __('Username') }}</label>
                    <div class="mt-1">
                      <input id="username" name="username" type="text" value="{{old('username') }} "placeholder="Enter unique Username" class="block w-full appearance-none rounded-md border border-gray-300 px-3 h-14 placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm">
                    </div>
                    <p class=" -mt-3 text-sm text-dark/60">Username should be unique, min 3 symbols </p>
                    <x-error name=username/>
                  </div>
                  <div>
                    <label for="email" class="block text-xs font-bold text-dark/100 ">{{ __('Email') }}</label>
                    <div class="mt-1">
                      <input id="email" name="email" type="email"  value="{{ old('email') }}" placeholder="Enter your email"  class=" block w-full appearance-none rounded-md border border-gray-300 px-3 h-14 placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm">
                    </div>
                    <x-error name=email/>
                  </div>

                  <div class="space-y-1">
                    <label for="password" class="block text-xs font-bold text-dark/100">{{ __('Password') }}</label>
                    <div class="mt-1">
                      <input id="password" name="password" type="password" placeholder="Fill in password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 h-14 placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm">
                    </div>
                    <x-error name=password/>
                  </div>

                  <div class="space-y-1">
                    <label for="password_confirmation" class="block text-xs font-bold text-dark/100">{{ __('Repeat password') }}</label>
                    <div class="mt-1">
                      <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repeat password" class="block w-full appearance-none rounded-md border border-gray-300 px-3 h-14 placeholder-gray-400 shadow-xs focus:border-brand/primary focus:outline-none focus:ring-brand/primary sm:text-sm">
                    </div>
                    <x-error name=password/>

                  </div>

                  <div class="flex items-center mb-4">
                    <input id="default-checkbox" type="checkbox" name="remember_me" class="w-4 h-4 text-blue-60 rounded border-gray-300 bg-grn"> 
                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-dark/100 dark:text-gray-300">Remember this device</label>
                  </div>
      
                  <div>
                    <button type="submit" class=" h-14 flex w-full justify-center rounded-md bg-grn py-2 px-4 font-bold pt-4 text-white shadow-xs focus:outline-none focus:ring-2 ">{{__("SIGN UP")  }}</button>
                  </div>
                  <p class=" text-center text-dark/60">Already have an account? 
                    <a href="" class="text-dark/100 font-bold">Log in</a>
                  </p>
                </form>
            </div>
          </div>
        </div>
        <div class=" hidden flex-1 lg:block w-500px relative ">
          <img class="object-cover h-full w-full right-0 absolute" src="/images/background.png" alt="background-image" >
        </div>
      </div>



    
</body>
</html>
