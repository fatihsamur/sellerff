 <div class="w-full px-4 lg:w-5/12 xl:w-4/12">
   <div class="wow fadeInUp rounded-lg bg-white py-10 px-8 shadow-testimonial sm:py-12 sm:px-10 md:p-[60px] lg:p-10 lg:py-12 lg:px-10 2xl:p-[60px]" data-wow-delay=".2s
              ">
     <h3 class="mb-8 text-2xl font-semibold md:text-[26px]">
       İletişim Formu
     </h3>
     <form id="contactForm">

       <div class="mb-6">
         <label for="fullName" class="block text-xs text-dark"> İsim Soyisim* </label>
         <input type="text" wire:model="sender" name="name" id="name" required data-error="Please enter your name" placeholder="Mehmet Yılmaz" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />



       </div>
       <div class="mb-6">
         <label for="email" class="block text-xs text-dark">Email*</label>
         <input type="email" wire:model="email" id="email" name="email" required data-error="Please enter your email" placeholder="örnek@gmail.com" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />



       </div>
       <div class="mb-6">
         <label for="phone" class="block text-xs text-dark">Telefon*</label>
         <input type="text" name="phone" placeholder="+90 532 123 45 67" class="w-full border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none" />
       </div>
       <div class="mb-6">
         <label for="message" class="block text-xs text-dark">Mesajınız*</label>
         <textarea rows="1" wire:model="message" id="message" name="message" data-error="Write your message" required placeholder="Mesajınızı buraya yazınız" class="w-full resize-none border-0 border-b border-[#f1f1f1] py-4 focus:border-primary focus:outline-none"></textarea>


       </div>
       @if ($errors->any())
       <div class="text-sm text-red-600">
         Devam etmek için form alanlarını doğru bir biçimde doldurduğunuza emin olun.
       </div>
       @foreach ($errors->all() as $key => $error)
       <span class="text-sm text-red-600">{{ $error }}
         @if (!$loop->last), @endif
       </span>



       <div class="mb-0">
         <a type="submit" id="form-submit" wire:click="sendEmail()" class="inline-flex items-center justify-center rounded bg-primary py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">

           Gönder
         </a>
       </div>
     </form>
   </div>
 </div>
