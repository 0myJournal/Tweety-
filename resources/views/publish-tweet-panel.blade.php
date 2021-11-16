<div class="border border-blue-400 rounded-3xl px-8 py-6 mb-8 bg-gray-100">
    <form method="post" action="/tweets" enctype="multipart/form-data">
        @csrf
        <textarea 
        name="body"
        id="tweet_text"
        maxlength="255"
        class="w-full border border-gray-300 p-4 rounded-xl" 
        placeholder="What are you up to? {{ auth()->user()->name }}"
        oninput="getLetters()"
        required
        > </textarea>
        <div id="suggestions" class="hidden">
        <ul id="users" class="bg-blue-300 p-2 rounded-b-xl w-72 ">
        </ul>
        </div>
        <div 
        class="max-w-sm mt-5 mb-2 ">

        <x-remove-picture>
        </x-remove-picture>
        <img src="" 
        id="inputImage" 
        style="margin-left: 20px"
        class="rounded-2xl overflow-hidden">
        
        </div>
        <div class="mb-4 flex"> 
            <input 
            name="image"
            class="mt-2" 
            style="width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;" 
            type="file" 
            onchange="getImage(this, 'inputImage')"
            id="file-input">
                <label for="file-input">
                <x-upload-image></x-upload-image>
                </label>
        
            <p id="current_letters"
            class="text-gray-500 mt-2 ml-auto float-right bg-white px-2 rounded"> 0/255</p> <br></div>
        <hr class="my-4">
        
        <footer class="flex justify-between">
            
            <img 
                width="40"
                height="40"
                src="{{ auth()->user()->getAvatar()}}" 
                alt="" 
                class="rounded-full mr-2"
            >
        <button type="submit" class="
        bg-blue-500 rounded-2xl shadow py-2 px-10 text-white font-bold
        hover:bg-blue-600">Tweet!</button>
        
        </footer>
        
    </form>
    
    @error('body')
    <p class="text-red-500 text-sm-left mt-3">{{ $message }}</p>
    @enderror
</div>
