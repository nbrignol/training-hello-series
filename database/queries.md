# Requêtes pour Hello Serie : 
  
## Notes par utilisateur  
    
### Les notes des séries données par l'utilisateur 1 

```select 
`show`.id,
`show`.label,
show_user_note.note
from show_user_note
left join `show` on `show`.id = show_user_note.id_show
where id_user = 1```

### Les notes "héritées" par les tags des séries notées par l'utilisateur 1

```select 
`show`.id,
`show`.label,
show_user_note.note,
tag.label
from show_user_note
left join `show` on `show`.id = show_user_note.id_show
left join show_tag on show_tag.id_show = `show`.id
left join tag on tag.id = show_tag.id_tag
where id_user = 1```

### Le total des notes par tag pour l'utilisateur 1 (aggrégation des notes par tag)

```select 
tag.id,
tag.label,
sum(show_user_note.note) as noteAggreg
from show_user_note
left join `show` on `show`.id = show_user_note.id_show
left join show_tag on show_tag.id_show = `show`.id
left join tag on tag.id = show_tag.id_tag
where id_user = 1
group by tag.id
order by noteAggreg DESC```

## Recommandations de séries basé sur les notes des autres séries

### Toutes les séries que l'utilisateur 1 n'a pas noté

```select `show`.id, `show`.label
from `show`
left join show_user_note on show_user_note.id_show = `show`.id and  show_user_note.id_user = 1  
where show_user_note.id_show is null```

### Tous les tags des séries que l'utilisateur 1 n'a pas noté

```select `show`.id, `show`.label, show_tag.id_tag
from `show`
left join show_user_note on show_user_note.id_show = `show`.id and  show_user_note.id_user = 1  
left join show_tag  on show_tag.id_show = `show`.id where show_user_note.id_show is null```

### Association des notes des tags de l'utilisateur 1 sur les tags des séries que l'utilisateur 1 n'a pas noté

```select `show`.id, `show`.label, 
show_tag.id_tag,
notation_tag.notation_tag_note
from `show`
left join show_tag  on show_tag.id_show = `show`.id 
left join show_user_note on show_user_note.id_show = `show`.id and  show_user_note.id_user = 1  
left join (
	select 
	tag.id as notation_tag_id,
	sum(show_user_note.note) as notation_tag_note
	from show_user_note
	left join `show` on `show`.id = show_user_note.id_show 
	left join show_tag on show_tag.id_show = `show`.id
	left join tag on tag.id = show_tag.id_tag
	where id_user = 1
	group by tag.id
	order by notation_tag_note DESC
) as notation_tag on show_tag.id_tag = notation_tag.notation_tag_id
where show_user_note.id_show is  null```

### Le total des notes par série pour l'utilisateur 1 (aggrégation des notes de l'utilisateur par série)

```select `show`.id, `show`.label, 
sum(notation_tag.notation_tag_note) as show_note
from `show`
left join show_tag  on show_tag.id_show = `show`.id 
left join show_user_note on show_user_note.id_show = `show`.id and  show_user_note.id_user = 1  
left join (
	select 
	tag.id as notation_tag_id,
	sum(show_user_note.note) as notation_tag_note
	from show_user_note
	left join `show` on `show`.id = show_user_note.id_show	 
	left join show_tag on show_tag.id_show = `show`.id
	left join tag on tag.id = show_tag.id_tag
	where id_user = 1
	group by tag.id
	order by notation_tag_note DESC
) as notation_tag on show_tag.id_tag = notation_tag.notation_tag_id
where show_user_note.id_show is  null
group by `show`.id
order by show_note DESC```
