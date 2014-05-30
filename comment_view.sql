create view comment_view
	as
	select u.username,o.id,f.taste,f.fast,f.comment,f.needcomment,o.restname,f.updated_at
	from users u
	inner join orders o 
	on u.id = o.userid
	inner join fullorder f
	on o.id = f.orderid