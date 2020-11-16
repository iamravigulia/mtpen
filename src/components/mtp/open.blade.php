<div>
    <style>
        .fmt_box{
            margin: 10px 20px;
            padding: 10px 20px;
            border: 4px solid #eeeeee;
            background: #fff;
            box-shadow: 2px 4px 8px #b1b1b1;
        }
        .fmt_headline{
            font-size: 20px;
            margin:10px 0;
        }
        .fmt_label{
            font-size: 14px;
        }
        .fmt_input{
            padding:4px 10px;
            border:1px solid #707070;
            border-radius: 4px;
            display: block;
            font-size: 16px;
        }
        .fmt_sub_btn{
            padding:6px 20px;
            margin:10px 0;
            border-radius: 8px;
            background:#0047d4;
            color:#fff;
            border:none;
            letter-spacing: 1px;
            cursor: pointer;
        }
        .fmt_checkbox{
            width: 22px;
            height: 22px;
            display: block;
        }
        .fmt_flex{
            display: flex;
            margin: 10px 0;
        }
        #addOption{
            padding: 6px 20px;
            background: #049e04;
            color: #fff;
            cursor: pointer;
        }
    </style>
    <form action="{{route('fmt.matchthepairs.store')}}" method="post" class="fmt_box">
        <div class="fmt_headline">Add a Match the pairs Question</div>
        <div>
            <label class="fmt_label" for="">Question</label>
            <input class="fmt_input" type="text" name="question" placeholder="Question" required>
        </div>
        <hr>
        {{-- answer1-match1 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 1</label>
                <input class="fmt_input" type="text" name="answer1" placeholder="Answer" required>
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 1</label>
                <input class="fmt_input" type="text" name="match1" placeholder="Match for Answer 1" required>
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer2-match2 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 2</label>
                <input class="fmt_input" type="text" name="answer2" placeholder="Answer">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 2</label>
                <input class="fmt_input" type="text" name="match2" placeholder="Match for Answer 2">
            </div>
        </div>
        {{-- //answer2-match2 --}}
        {{-- answer3-match3 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 3</label>
                <input class="fmt_input" type="text" name="answer3" placeholder="Answer">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 3</label>
                <input class="fmt_input" type="text" name="match3" placeholder="Match for Answer 3">
            </div>
        </div>
        {{-- //answer3-match3 --}}
        {{-- answer4-match4 --}}
        <div class="fmt_flex">
            <div>
                <label class="fmt_label" for="">Answer 4</label>
                <input class="fmt_input" type="text" name="answer4" placeholder="Answer">
            </div>
            <div style="margin-left:20px;">
                <label class="fmt_label" for="">Match for Answer 4</label>
                <input class="fmt_input" type="text" name="match4" placeholder="Match for Answer 4">
            </div>
        </div>
        {{-- //answer4-match4 --}}
        <div>
            <input type="submit" class="fmt_sub_btn" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
    {{--  --}}
    <div class="my-12 py-4 px-4 border border-gray-400 shadow-lg">
        <div>Import csv</div>
        <form class="flex" action="{{route('fmt.matchthepairs.csv_upload')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <input type="file" name="file">
            <button type="submit" style="display: inline-block; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
        </form>
    </div>
    {{--  --}}
</div>
{{-- <script>
    var addOption = document.getElementById('addOption');

</script> --}}