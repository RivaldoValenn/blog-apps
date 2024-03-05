
@if (session()->has('success'))
<div id="alert-border-3" class="w-full flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
   <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
     <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
   </svg>
   <div class="ms-3 text-sm font-medium">
       
           {{ session('success') }}
  
   </div>
   <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
     <span class="sr-only">Dismiss</span>
     <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
     </svg>
   </button>
</div>
@endif
<a href="/dashboard/posts/create" class="mb-2">
  <button type="button" class="text-white bg-blue-700 capitalize hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create new post</button>
</a>
<div class="flex flex-wrap -mx-3">
  <div class="flex-none w-full max-w-full px-3">
    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
      <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
        <h6>My Posts</h6>
      </div>
      <div class="flex-auto px-0 pt-0 pb-2">
        <div class="p-0 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
            <thead class="align-bottom">
              <tr>
                <th class="px-6 py-3 font-bold uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 text-center">No</th>
                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Created At</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Images Post</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Content</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Likes</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Views</th>
                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Detail</th>
              </tr>
            </thead>
            <tbody>
             @if($posts ->count() > 0)
             @foreach ($posts as $post)   
             <tr>
               <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <span class="text-xs font-semibold leading-tight text-slate-400">{{ $loop->iteration }}</span>
               </td>
               <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <div class="flex px-2 py-1">
                   <div class="flex flex-col justify-center">
                     <h6 class="mb-0 text-sm leading-normal">{{ $post->title }}</h6>
                     <p class="mb-0 text-xs leading-tight text-slate-400">{{ $post->category->name }}</p>
                   </div>
                 </div>
               </td>
               <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <p class="mb-0 text-xs font-semibold leading-tight">
                   @if($post->created_at->diffInDays() > 0)
                       {{ $post->created_at->format('F j Y | g:i A') }}
                   @else
                       {{ $post->created_at->diffForHumans() }}
                   @endif
               </p>
               </td>
               <td class="flex justify-center p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <img src="{{ asset('storage/'.$post->image) }}" alt="" width="75" height="75">
               </td>
               <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <span class="text-xs font-semibold leading-tight text-slate-400">{!! Str::limit($post->body, 40) !!}</span>
               </td>
               <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <span class="text-xs font-semibold leading-tight text-slate-400">{{ $post->likes()->count() }}</span>
               </td>
               <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <span class="text-xs font-semibold leading-tight text-slate-400">{{ $post->views }}</span>
               </td>
               <td class="p-2 text-center bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <a href="/dashboard/posts/{{ $post->slug }}" class="text-xl font-semibold leading-tight text-sky-600"><i class="ph ph-eye"></i></a>
               </td>
             </tr>
             @endforeach
             @else
             <tr>
               <td colspan="6" class="p-4 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                 <span class="text-lg font-semibold leading-tight text-slate-400">You don't have any posts</span>
               </td>
             </tr>
             @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
