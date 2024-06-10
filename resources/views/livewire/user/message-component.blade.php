<div>
    {{-- In work, do what you enjoy. --}}
    <main>

    
    <div class="messagesArea section-padding2 toped">
        <div class="container">

            <div class="row mb-24">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{'message'}}">Chat</a></li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="messagesWrapper">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 col-md-12">

                                <div class="userList">
                                    @forelse($contacts as $contact)
                                    <a href="{{ route('message',['chatid'=>$contact->chat_id]) }}">
                                        <div class="singleUser @if($pid == $contact->product_id) active @endif">
                                            <div class="listCap">
                                                <div class="userProduct-group">

                                                    <label class="checkWrap">
                                                        <input class="effectBorder" type="checkbox" value>
                                                        <span class="checkmark"></span>
                                                    </label>

                                                    <div class="userProduct-img">
                                                        <img src="{{asset('admin/userprofile')}}/{{$contact->nextuser->profile}}" alt="img"
                                                            class="productImg">
                                                        <img src="{{asset('admin/product/feat')}}/{{$contact->product->featimage}}" alt="img"
                                                            class="userImg">
                                                    </div>
                                                </div>
                                                <div class="proCaption">
                                                    <h5><a href="{{ route('message',['chatid'=>$contact->chat_id]) }}" class="messageTittle">{{$contact->nextuser->name}}</a></h5>
                                                    <p class="messageCap">{{$contact->product->name}}</p>
                                                    <span class="pricing">Can you make it to Rs 289 please?</span>
                                                </div>
                                            </div>
                                            <div class="timmer mb-20">
                                                <span class="time">04:32 PM</span>
                                            </div>
                                        </div>
                                    </a>
                                    @empty
                                        <p>No Chat found yet</p>
                                    @endforelse
                                    {{--<div class="singleUser active">
                                        <div class="listCap">
                                            <div class="userProduct-group">

                                                <label class="checkWrap">
                                                    <input class="effectBorder" type="checkbox" value>
                                                    <span class="checkmark"></span>
                                                </label>

                                                <div class="userProduct-img">
                                                    <img src="../assets/img/gallery/addPro1.jpg" alt="img"
                                                        class="productImg">
                                                    <img src="../assets/img/gallery/user1.jpg" alt="img"
                                                        class="userImg">
                                                </div>
                                            </div>
                                            <div class="proCaption">
                                                <h5><a href="#" class="messageTittle">Leslie Alexandar</a></h5>
                                                <p class="messageCap">Modern furnished apartment</p>
                                                <span class="pricing">Can you make it to Rs 289 please?</span>
                                            </div>
                                        </div>
                                        <div class="timmer mb-20">
                                            <span class="time">04:32 PM</span>
                                        </div>
                                    </div>

                                    <div class="singleUser">
                                        <div class="listCap">
                                            <div class="userProduct-group">

                                                <label class="checkWrap">
                                                    <input class="effectBorder" type="checkbox" value>
                                                    <span class="checkmark"></span>
                                                </label>

                                                <div class="userProduct-img">
                                                    <img src="../assets/img/gallery/addPro2.jpg" alt="img"
                                                        class="productImg">
                                                    <img src="../assets/img/gallery/user2.jpg" alt="img"
                                                        class="userImg">
                                                </div>
                                            </div>
                                            <div class="proCaption">
                                                <h5><a href="#" class="messageTittle">Esther Howard</a></h5>
                                                <p class="messageCap">Beats Solo3 Wireless</p>
                                                <span class="pricing">Can you make it to Rs 289 please?</span>
                                            </div>
                                        </div>
                                        <div class="timmer mb-20">
                                            <span class="time">04:32 PM</span>
                                        </div>
                                    </div>

                                    <div class="singleUser">
                                        <div class="listCap">
                                            <div class="userProduct-group">

                                                <label class="checkWrap">
                                                    <input class="effectBorder" type="checkbox" value>
                                                    <span class="checkmark"></span>
                                                </label>

                                                <div class="userProduct-img">
                                                    <img src="../assets/img/gallery/addPro3.jpg" alt="img"
                                                        class="productImg">
                                                    <img src="../assets/img/gallery/user3.jpg" alt="img"
                                                        class="userImg">
                                                </div>
                                            </div>
                                            <div class="proCaption">
                                                <h5><a href="#" class="messageTittle">Eleanor Pena</a></h5>
                                                <p class="messageCap">Modern furnished apartment</p>
                                                <span class="pricing">Can you make it to $289 please?</span>
                                            </div>
                                        </div>
                                        <div class="timmer mb-20">
                                            <span class="time">04:32 PM</span>
                                        </div>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6 col-md-12">
                                @if($uuid != '') 
                                <div class="messagesDetails">

                                    <div class="showProduct mb-24">
                                        <div class="proCap">
                                            <div class="proImg">
                                                <img src="{{asset('admin/product/feat')}}/{{$product->featimage}}" alt="img">
                                            </div>
                                            <div class="proCaption">
                                                <h5><a href="#" class="proTittle">{{$product->name}}</a></h5>
                                                <p class="proPera">Ladies analog watch</p>
                                            </div>
                                        </div>
                                        <div class="flag mb-20">
                                            <i class="lab la-font-awesome-flag icon"></i>
                                        </div>
                                    </div>


                                    <div class="messageBox" wire:poll.keep-alive>
                                        <div class="messageShow">
                                            @forelse($messages as $message)
                                                @if ($message->friend_id == auth()->id())
                                                    <div class="leftMessage">
                                                        <div class="singleLeft-message">
                                                            <div class="messageText">
                                                                <!-- <div class="messageImg">
                                                                    <img src="../assets/img/gallery/user1.jpg" alt="img">
                                                                </div> -->
                                                                <div class="messageCaption">
                                                                    <p class="messagePera">{{ $message->message }}</p>
                                                                    <span class="sendTime">{{ $message->created_at }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                @else
                                                    <div class="rightMessage">

                                                        <div class="singleRight-message">
                                                            <div class="messageText">
                                                                <div class="messageCaption">
                                                                    <p class="messagePera">{{ $message->message }}</p>
                                                                    <span class="sendTime">{{ $message->created_at }}</span>
                                                                </div>
                                                                <!-- <div class="messageImg">
                                                                    <img src="../assets/img/gallery/user1.jpg" alt="img">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @empty
                                                <div class="singleRight-message">  
                                                    @if($uuid != '')                                           
                                                    <p>Say Hi to {{ $user->name }}</p>  
                                                    @endif 
                                                </div>
                                            @endforelse
                                        </div>

                                        <div class="messageSend">
                                            <form wire:submit.prevent="send_message" method="get">
                                                <input class="input" type="text" name="message" wire:model.lazy="message"
                                                    placeholder="Write your message...">
                                                <div class="btn-wrapper form-icon">
                                                    <button class="btn-rounded2" type="submit" name="submit" wire:click="send_message">Send 
                                                    </button>
                                                </div>
                                                <!-- <div class="imgSlector">
                                                    <i class="lar la-image icon"></i>
                                                </div> -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</div>
