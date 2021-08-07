<x-layout>
    <div class="container mt-5">
        <!-- Success message -->
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <form method="post"
              action="{{ route('contact.store') }}"
              class="w-full max-w-lg"
        >
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label for="name"
                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Name
                    </label>
                    <input type="text"
                           class="{{ $errors->has('name') ? 'error' : '' }}
                               appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded
                               py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                           name="name"
                           id="name"
                    >

                    @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="">
                    <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Email
                    </label>
                    <input type="email"
                           class="{{ $errors->has('email') ? 'error' : '' }}"
                           name="email"
                           id="email"
                    >

                    @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

{{--                <div class="">--}}
{{--                    <label for="phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">--}}
{{--                        Phone--}}
{{--                    </label>--}}
{{--                    <input type="text"--}}
{{--                           class="{{ $errors->has('phone') ? 'error' : '' }}"--}}
{{--                           name="phone"--}}
{{--                           id="phone"--}}
{{--                    >--}}
{{--                    <p class="text-gray-600 text-xs italic">--}}
{{--                        *nebūtina--}}
{{--                    </p>--}}

{{--                    @if ($errors->has('phone'))--}}
{{--                        <div class="error">--}}
{{--                            {{ $errors->first('phone') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}

                <div class="">
                    <label for="subject" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Subject
                    </label>
                    <input type="text"
                           class="{{ $errors->has('subject') ? 'error' : '' }}"
                           name="subject"
                           id="subject"
                    >

                    @if ($errors->has('subject'))
                        <div class="error">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>

                <div class="">
                    <label for="message">Message</label>
                    <textarea class="{{ $errors->has('message') ? 'error' : '' }}
                        no-resize appearance-none block w-full bg-gray-200 text-gray-700
                        border border-gray-200 rounded py-3 px-4 mb-3 leading-tight
                        focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none"
                              name="message"
                              id="message"
                              rows="4"
                    ></textarea>

                    @if ($errors->has('message'))
                        <div class="error">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>

                <input type="submit"
                       name="send"
                       value="Submit"
                       class="shadow bg-teal-400 hover:bg-teal-400
                              focus:shadow-outline focus:outline-none
                              text-white font-bold py-2 px-4 rounded"
                >
                <div class="md:w-2/3"></div>
            </div>
        </form>
    </div>


    @include('articles._footer')
</x-layout>
