<?php 
/** 
 * 备注 Widget
 * @example W('Remark',array('uid'=>1000,'remark'=>'TS3.0','showonly'=>0))
 * @version TS3.0
 */
class RemarkWidget extends Widget{
	private  static $rand = 1;
	/**
	 * @param integer uid 目标用户的UID
	 * @param string remark 用户已经被设置的备注名称
	 * @param integer showonly 是否只显示已有的备注
	 */
	public function render($data){
		
		$var = array();
		$var['uid'] = $GLOBALS['ts']['uid'];
		$var['remark'] = '';
		is_array($data) && $var = array_merge($var,$data);
		if($var['uid'] == $GLOBALS['ts']['mid']){
			return '';
		}
		$var['rand'] = self::$rand;
	    //渲染模版
	    $content = $this->renderFile(dirname(__FILE__)."/remark.html",$var);
	
		self::$rand ++;

		unset($var,$data);
        //输出数据
		return $content;
	}
	
	/**
	 * 渲染备注编辑弹框
	 * @return string 修改后的备注内容
	 */
	public function edit(){
		$var = $_REQUEST;
		$content = $this->renderFile(dirname(__FILE__)."/edit.html",$var);
		return $content;
	}
}	
?>