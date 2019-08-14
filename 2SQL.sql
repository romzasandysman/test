SELECT communities.id, communities.name, permissions.name, count(community_members.user_id) as countUsersPrem
FROM communities, community_members, permissions, community_member_permissions
WHERE community_members.community_id = communities.id AND permissions.id = community_member_permissions.permission_id
AND community_members.id = community_member_permissions.member_id 
GROUP BY communities.id, communities.name, permissions.name
HAVING countUsersPrem > 5
ORDER BY  communities.id DESC, countUsersPrem ASC LIMIT 100;