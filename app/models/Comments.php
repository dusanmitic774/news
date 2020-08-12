<?php

namespace models;

use libs\Database;

class Comments extends Database
{
    const TABLENAME = 'comments';

    const PRIMARY_KEY = 'comments_id';

    const NEWS_ID = 'news_id';

    const USERNAME = 'username';

    const TEXT = 'text';

    public function getComments()
    {
        return $this->createQuery('SELECT *', self::TABLENAME);
    }

    public function addComment($data)
    {
        $this->add(self::TABLENAME, $data);
    }

    public function getCommentById($id)
    {
        return $this->createQuery('SELECT *', self::TABLENAME, [self::PRIMARY_KEY => $id]);
    }

    public function getCommentsByNewsId($id)
    {
        return $this->createQuery('SELECT *', self::TABLENAME, [self::NEWS_ID => $id]);
    }

    public function deleteCommentsByNewsId($id)
    {
        return $this->createQuery('DELETE', self::TABLENAME, [self::NEWS_ID => $id]);
    }

    public function deleteComment($comment_id)
    {
        $this->createQuery('DELETE', self::TABLENAME, [self::PRIMARY_KEY => $comment_id]);
    }
}
