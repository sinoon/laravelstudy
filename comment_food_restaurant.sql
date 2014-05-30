create view comment_food_restaurant
	as
	select c.user_id,c.for_food,c.for_restaurant,c.food_id,c.restaurant_id,c.status,f.name as food_name,r.restaurantname as restaurant_name,r.username as username,f.savename
	from customer_comment c
	inner join foods f
	on c.food_id = f.id
	inner join restaurants r
	on f.belongto = r.username