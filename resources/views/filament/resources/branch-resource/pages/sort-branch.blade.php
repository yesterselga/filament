<x-filament::page>

     <div class="card">
          
          <div class="card-body" id="messagesContainer">
               <div class="input-group">
                    <input class="block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70 dark:bg-gray-700 dark:text-white dark:focus:border-primary-600 border-gray-300 dark:border-gray-600" id="message" autocomplete="off" />
                    <button class="btn btn-primary" onclick="send()">Send</button>
               </div>
          </div>
     </div>

     <script type="module">
          import { io } from "https://cdn.socket.io/4.3.2/socket.io.esm.min.js";

          const socket = io("http://localhost:3000");

          socket.emit('join', ' yester joined');
     </script>
          
     <script>
          function send(){
               const user = 'yester';
               const message = document.getElementById('message').value;
               socket.emit('sendmessage', { user: user, message: message });
          }
     </script>
</x-filament::page>

