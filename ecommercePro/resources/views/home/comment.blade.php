<div style="text-align:center; padding-bottom: 30px;">
      <h1 style="font-size:30px; text-align: center; padding:20px 20px; ">Comments</h1>

      <form action="{{url('add_comment')}}" method="POST" >
        @csrf
        <textarea style="height: 150px; width: 600px;" placeholder="Comment Something" name="comment">
        </textarea>
        <br>
        <input type="submit" class="btn btn-primary"  value="Add Comment">    
     </form>

    </div>

    <div style="padding-left:15%">
    
      <h1 style="font-size:30px; padding-bottom:20px;"  class="font-mono" >All Comments</h1>
        @foreach($comments as $comment) 

        <div>
          <b >{{$comment->name}}</b>
          <p class="italic">{{$comment->comment}}</p>
          <a href="javascript::void(0);" onclick="reply(this)">Reply</a>
        </div>

        @endforeach
  
      <div style="display:none" id="replyDiv">
        <textarea style="height: 100px; width: 350px;" placeholder="Reply Something" ></textarea>
        <br>
        <a href="javascript::void(0);" class="btn btn-primary">Reply</a>
        <a href="javascript::void(0);" class="btn btn-danger" onclick="reply_close(this)">Close</a>
      </div>
      
    </div>



    <script type="text/javascript">
        function reply(caller) {
          $('#replyDiv').insertAfter($(caller));
          $('#replyDiv').show();
        }

        function reply_close(caller) {
          $('#replyDiv').hide();
        }
      </script>