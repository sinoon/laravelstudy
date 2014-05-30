<?php

class FoodSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('foods')->insert([
			[ 'belongto' => 'linoon' , 'name' => '爱心黑椒鸡腿盖饭' , 'price' => '8.5' , 'stock' => '30' , 'note' => '爱心黑椒鸡腿盖饭，精选剔骨，加料酒，生抽，黑胡椒腌制一晚制作而成' , 'foodimg' => '爱心黑椒鸡腿盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '彩椒牛肉盖饭' , 'price' => '10' , 'stock' => '50' , 'note' => '彩椒牛肉盖饭，主料：彩椒，一般人群均可食用彩椒，非常适宜在夏季食用' , 'foodimg' => '彩椒牛肉盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '橙汁虾球盖饭' , 'price' => '12' , 'stock' => '20' , 'note' => '橙汁虾球盖饭，精选柳橙去皮、去籽，果肉切小丁状，再与所有调味料拌匀，一起入锅煮滚柳橙去皮、去籽，果肉切小丁状，再与所有调味料拌匀，一起入锅煮滚' , 'foodimg' => '橙汁虾球盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '豆腐盖饭' , 'price' => '11' , 'stock' => '15' , 'note' => '豆腐盖饭，香辣回味的豆腐盖饭' , 'foodimg' => '豆腐盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '鸡肉盖饭' , 'price' => '10' , 'stock' => '30' , 'note' => '鸡肉盖饭，香喷喷的鸡腿，在鸡肉上撒盐和现磨的黑胡椒碎，使得鸡腿更加入味，让人回味无穷' , 'foodimg' => '鸡肉盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '鸡肉滑蛋盖饭' , 'price' => '12' , 'stock' => '34' , 'note' => '鸡肉滑蛋盖饭,皮白柔嫩、肥而不腻、香鲜味美，具有香、酥、嫩的特点。' , 'foodimg' => '鸡肉滑蛋盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '姜汁里肌盖饭' , 'price' => '15' , 'stock' => '20' , 'note' => '姜汁里肌盖饭，五色俱全，让人忍不住口水直流。' , 'foodimg' => '姜汁里肌盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '咖喱鸡丁盖饭' , 'price' => '15' , 'stock' => '24' , 'note' => '咖喱鸡丁盖饭，浓浓的咖喱配上鲜美入味的鸡丁。' , 'foodimg' => '咖喱鸡丁盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '咖喱肉丸盖饭' , 'price' => '10' , 'stock' => '20' , 'note' => '咖喱肉丸盖饭，精致的、经过很到工序加工处理的美味肉丸，外面包裹着浓浓的咖喱。' , 'foodimg' => '咖喱肉丸盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '辣子鸡丁盖饭' , 'price' => '10' , 'stock' => '25' , 'note' => '辣子鸡丁盖饭，红彤，鲜美的，经过暴晒的辣椒，配上高汤熬制的鸡丁，美味无穷' , 'foodimg' => '辣子鸡丁盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '麻婆豆腐盖饭' , 'price' => '10' , 'stock' => '35' , 'note' => '麻婆豆腐盖饭，绝对正宗的麻婆豆腐，吃一口你就知道' , 'foodimg' => '麻婆豆腐盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '麻婆茄子盖饭' , 'price' => '10' , 'stock' => '25' , 'note' => '麻婆茄子盖饭，其中有秘制的豆瓣酱，让麻婆茄子盖饭的美味提升一个档次' , 'foodimg' => '麻婆茄子盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '泡菜牛腩盖饭' , 'price' => '10' , 'stock' => '35' , 'note' => '泡菜牛腩盖饭，正宗韩国泡菜，加上特制牛腩，味道你懂的' , 'foodimg' => '泡菜牛腩盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '泡菜烧肉盖饭' , 'price' => '15' , 'stock' => '34' , 'note' => '泡菜烧肉盖饭，依旧是正宗韩国泡菜，配上本店大厨亲情制作烧肉' , 'foodimg' => '泡菜烧肉盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '什锦珍菇盖饭' , 'price' => '15' , 'stock' => '34' , 'note' => '什锦珍菇盖饭，杏鲍菇，秀珍菇，金针菇，香菇，四菇俱全，什锦风味' , 'foodimg' => '什锦珍菇盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '糖醋里脊盖饭' , 'price' => '15' , 'stock' => '20' , 'note' => '糖醋里脊盖饭，这道家常盖饭，味道想必大家肯定非常熟悉，由我店镇店大厨亲手制作' , 'foodimg' => '糖醋里脊盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '糖醋排骨盖饭' , 'price' => '15' , 'stock' => '30' , 'note' => '糖醋排骨盖饭，秘制糖醋酱，配合高汤排骨，还等什么' , 'foodimg' => '糖醋排骨盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '五香肉燥盖饭' , 'price' => '15' , 'stock' => '31' , 'note' => '五香肉燥盖饭，古老工艺肉燥制作方法，配合我店秘制五香风味' , 'foodimg' => '五香肉燥盖饭.jpg' , 'type' => '盖饭' ],
			[ 'belongto' => 'linoon' , 'name' => '香辣豆豉肥牛盖饭' , 'price' => '15' , 'stock' => '32' , 'note' => '香辣豆豉肥牛盖饭，镇店之作，秘制的香辣酱与豆鼓合二为一，再加上精选肥牛，让人回味无穷' , 'foodimg' => '香辣豆豉肥牛盖饭.jpg' , 'type' => '盖饭' ],

			]);
	}

}