<?php
namespace app\index\controller;
use think\Request;
class Index
{
    public function index()
    {
        return view();
    }
    public function Runing(Request $request)
    {
        
        $Version=$request->post('V');//Python版本
        $Code=$request->post('Code');//PY代码
        $FileName=time().".py";//临时文件
        //$Codeing=$_GET["Code"];
        $TmpFile=fopen($FileName,"w");
        fwrite($TmpFile,$Code);
        fclose($TmpFile);
        $info=shell_exec("py -$Version  $FileName 2>&1");
        unlink($FileName);
        return $info;
    }
}
