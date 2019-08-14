SELECT users.name, communities.name, community_members.joined_at FROM users, communities, community_members WHERE community_members.community_id = communities.id
AND community_members.user_id = users.id AND communities.created_at > '2013-01-01 00:00:00' ORDER BY  community_members.joined_at DESC;