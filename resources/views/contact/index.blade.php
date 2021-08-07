<x-layout>
    <div class="container mt-5">
        <form method="post"
              action="{{ route('contact.store') }}"
              class="w-full max-w-lg"
        >
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label for="name"
                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Vardas
                    </label>
                    <input type="text"
                           name="name"
                           id="name"
                           class="{{ $errors->has('name') ? 'error' : '' }}
                               appearance-none block w-full bg-gray-200 text-gray-700
                               border border-gray-200 rounded py-3 px-4 mb-3
                               leading-tight focus:outline-none focus:bg-white"
                    >
                    @if ($errors->has('name'))
                        <div class="error">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="email"
                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Elektroninis paštas
                    </label>
                    <input type="email"
                           name="email"
                           id="email"
                           class="{{ $errors->has('email') ? 'error' : '' }}
                               appearance-none block w-full bg-gray-200 text-gray-700
                               border border-gray-200 rounded py-3 px-4 mb-3 leading-tight
                               focus:outline-none focus:bg-white focus:border-gray-500"
                    >
                    @if ($errors->has('email'))
                        <div class="error">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label for="subject"
                           class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                    >
                        Antraštė
                    </label>
                    <input type="text"
                           name="subject"
                           id="subject"
                           class="appearance-none block w-full bg-gray-200 text-gray-700
                               border border-gray-200 rounded py-3 px-4 mb-3 leading-tight
                               focus:outline-none focus:bg-white focus:border-gray-500"
                    >
                    @if ($errors->has('subject'))
                        <div class="error">
                            {{ $errors->first('subject') }}
                        </div>
                    @endif
                </div>

                <div class="w-full px-3">
                    <label for="message"
                           class="block uppercase tracking-wide
                                text-gray-700 text-xs font-bold mb-2"
                    >
                        Žinutė
                    </label>
                    <textarea name="message"
                              id="message"
                              class="{{ $errors->has('message') ? 'error' : '' }}
                                  no-resize appearance-none block w-full bg-gray-200
                                  text-gray-700 border border-gray-200 rounded
                                  py-3 px-4 mb-3 leading-tight focus:outline-none
                                  focus:bg-white focus:border-gray-500 h-48 resize-none"
                    ></textarea>
                    @if ($errors->has('message'))
                        <div class="error">
                            {{ $errors->first('message') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <p class="text-gray-600 text-xs italic">
                        Visi laukeliai yra privalomi
                    </p>
                    <button type="submit"
                            class="shadow bg-teal-400 hover:bg-teal-400
                                focus:shadow-outline focus:outline-none
                                text-black font-bold py-2 px-4 mb-4 rounded"
                    >
                        Siųsti!
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>

            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
        </form>
    </div>


    @include('articles._footer')
</x-layout>
