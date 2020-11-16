<?php

namespace edgewizz\matchthepairs\Controllers;
use App\Http\Controllers\Controller;
use Edgewizz\Matchthepairs\Models\MatchthepairsAns;
use Edgewizz\Matchthepairs\Models\MatchthepairsQues;
use Illuminate\Http\Request;

class MatchthepairsController extends Controller
{
    //
    public function test(){
        dd('hello');
    }
    public function store(Request $request){
        // dd($request->ans_correct1);
        $mQues = new MatchthepairsQues();
        $mQues->question = $request->question;
        $mQues->save();
        /* answer1-match1 */
        if($request->answer1){
            $mAns1 = new MatchthepairsAns();
            $mAns1->question_id = $mQues->id;
            $mAns1->answer = $request->answer1;
            $mAns1->save();
            if($request->match1){
                $mOpt1 = new MatchthepairsAns();
                $mOpt1->question_id = $mQues->id;
                $mOpt1->answer = $request->match1;
                $mOpt1->match_id = $mAns1->id;
                $mOpt1->save();
            }
        }
        /* answer1-match1 */
        /* answer2-match2 */
        if($request->answer2){
            $mAns2 = new MatchthepairsAns();
            $mAns2->question_id = $mQues->id;
            $mAns2->answer = $request->answer2;
            $mAns2->save();
            if($request->match2){
                $mOpt2 = new MatchthepairsAns();
                $mOpt2->question_id = $mQues->id;
                $mOpt2->answer = $request->match2;
                $mOpt2->match_id = $mAns2->id;
                $mOpt2->save();
            }
        }
        /* answer2-match2 */
        /* answer3-match3 */
        if($request->answer3){
            $mAns3 = new MatchthepairsAns();
            $mAns3->question_id = $mQues->id;
            $mAns3->answer = $request->answer3;
            $mAns3->save();
            if($request->match3){
                $mOpt3 = new MatchthepairsAns();
                $mOpt3->question_id = $mQues->id;
                $mOpt3->answer = $request->match3;
                $mOpt3->match_id = $mAns3->id;
                $mOpt3->save();
            }
        }
        /* answer3-match3 */
        /* answer4-match4 */
        if($request->answer4){
            $mAns4 = new MatchthepairsAns();
            $mAns4->question_id = $mQues->id;
            $mAns4->answer = $request->answer4;
            $mAns4->save();
            if($request->match4){
                $mOpt4 = new MatchthepairsAns();
                $mOpt4->question_id = $mQues->id;
                $mOpt4->answer = $request->match4;
                $mOpt4->match_id = $mAns4->id;
                $mOpt4->save();
            }
        }
        /* answer4-match4 */
        return back();
    }
    public function edit($id, Request $request){
        
    }

    public function csv_upload(Request $request){
        
        $file = $request->file('file');
        // dd($file);
        // File Details
        $filename = time().$file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $tempPath = $file->getRealPath();
        $fileSize = $file->getSize();
        $mimeType = $file->getMimeType();
        // Valid File Extensions
        $valid_extension = array("csv");
        // 2MB in Bytes
        $maxFileSize = 2097152;
        // Check file extension
        if (in_array(strtolower($extension), $valid_extension)) {
            // Check file size
            if ($fileSize <= $maxFileSize) {
                // File upload location
                $location = 'uploads';
                // Upload file
                $file->move($location, $filename);
                // Import CSV to Database
                $filepath = public_path($location . "/" . $filename);
                // Reading file
                $file = fopen($filepath, "r");
                $importData_arr = array();
                $i = 0;
                while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                    $num = count($filedata);
                    // Skip first row (Remove below comment if you want to skip the first row)
                    if($i == 0){
                        $i++;
                        continue;
                    }
                    for ($c = 0; $c < $num; $c++) {
                        $importData_arr[$i][] = $filedata[$c];
                    }
                    $i++;
                }
                fclose($file);
                // Insert to MySQL database
                foreach ($importData_arr as $importData) {
                    $insertData = array(
                            "question" => $importData[1],
                            "answer1" => $importData[2],
                            "match1" => $importData[3],
                            "answer2" => $importData[4],
                            "match2" => $importData[5],
                            "answer3" => $importData[6],
                            "match3" => $importData[7],
                            "answer4" => $importData[8],
                            "match4" => $importData[9],
                            "answer5" => $importData[10],
                            "match5" => $importData[11],
                            "answer6" => $importData[12],
                            "match6" => $importData[13],
                        );
                        // var_dump($insertData['answer1']); 
                        /*  */
                        if($insertData['question']){
                            $fill_Q = new MatchthepairsQues();
                            $fill_Q->question = $insertData['question'];
                            $fill_Q->save();
                            
                            if($insertData['answer1'] == '-'){
                            }else{
                                $f_Ans1 = new MatchthepairsAns();
                                $f_Ans1->question_id = $fill_Q->id;
                                $f_Ans1->answer = $insertData['answer1'];
                                $f_Ans1->save();
                                $mOpt1 = new MatchthepairsAns();
                                $mOpt1->question_id = $fill_Q->id;
                                $mOpt1->answer = $insertData['match1'];
                                $mOpt1->match_id = $f_Ans1->id;
                                $mOpt1->save();
                            }
                            if($insertData['answer2'] == '-'){
                            }else{
                                $f_Ans2 = new MatchthepairsAns();
                                $f_Ans2->question_id = $fill_Q->id;
                                $f_Ans2->answer = $insertData['answer2'];
                                $f_Ans2->save();
                                $mOpt2 = new MatchthepairsAns();
                                $mOpt2->question_id = $fill_Q->id;
                                $mOpt2->answer = $insertData['match2'];
                                $mOpt2->match_id = $f_Ans2->id;
                                $mOpt2->save();
                            }
                            if($insertData['answer3'] == '-'){
                            }else{
                                $f_Ans3 = new MatchthepairsAns();
                                $f_Ans3->question_id = $fill_Q->id;
                                $f_Ans3->answer = $insertData['answer3'];
                                $f_Ans3->save();
                                $mOpt3 = new MatchthepairsAns();
                                $mOpt3->question_id = $fill_Q->id;
                                $mOpt3->answer = $insertData['match3'];
                                $mOpt3->match_id = $f_Ans3->id;
                                $mOpt3->save();
                            }
                            if($insertData['answer4'] == '-'){
                            }else{
                                $f_Ans4 = new MatchthepairsAns();
                                $f_Ans4->question_id = $fill_Q->id;
                                $f_Ans4->answer = $insertData['answer4'];
                                $f_Ans4->save();
                                $mOpt4 = new MatchthepairsAns();
                                $mOpt4->question_id = $fill_Q->id;
                                $mOpt4->answer = $insertData['match4'];
                                $mOpt4->match_id = $f_Ans4->id;
                                $mOpt4->save();
                            }
                            if($insertData['answer5'] == '-'){
                            }else{
                                $f_Ans5 = new MatchthepairsAns();
                                $f_Ans5->question_id = $fill_Q->id;
                                $f_Ans5->answer = $insertData['answer5'];
                                $f_Ans5->save();
                                $mOpt5 = new MatchthepairsAns();
                                $mOpt5->question_id = $fill_Q->id;
                                $mOpt5->answer = $insertData['match5'];
                                $mOpt5->match_id = $f_Ans5->id;
                                $mOpt5->save();
                            }
                            if($insertData['answer6'] == '-'){
                            }else{
                                $f_Ans6 = new MatchthepairsAns();
                                $f_Ans6->question_id = $fill_Q->id;
                                $f_Ans6->answer = $insertData['answer6'];
                                $f_Ans6->save();
                                $mOpt6 = new MatchthepairsAns();
                                $mOpt6->question_id = $fill_Q->id;
                                $mOpt6->answer = $insertData['match6'];
                                $mOpt6->match_id = $f_Ans6->id;
                                $mOpt6->save();
                            }
                        }
                        /*  */
                    }
                // Session::flash('message', 'Import Successful.');
            } else {
                // Session::flash('message', 'File too large. File must be less than 2MB.');
            }
        } else {
            // Session::flash('message', 'Invalid File Extension.');
        }
    return back();
}
}
