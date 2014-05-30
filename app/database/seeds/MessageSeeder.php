<?php

class MessageSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{	
		message::insert([
			['sent' => '饿了吧快捷订餐运营工作组','receive' => 'linoon','title' => '欢迎你加入到饿了吧快捷订餐的大家庭中来！','content' => '当然了，这里还仅仅是我一个试验品，一个学习Laravel这个PHP框架的试验品','status' => '1']
			]);
	}

}