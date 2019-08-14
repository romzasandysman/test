SELECT users.name as user, communities.name as commun, permissions.name as perm
FROM communities, community_members, permissions, community_member_permissions, users
WHERE community_members.community_id = communities.id AND permissions.id = community_member_permissions.permission_id
AND community_members.id = community_member_permissions.member_id 
AND users.id = community_members.user_id
AND (users.name LIKE "%T%" OR  users.name LIKE "%t%" OR permissions.name LIKE "%articles%")
AND (LENGTH(communities.name) >= 15);