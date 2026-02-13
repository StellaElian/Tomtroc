<?php
class Conversation extends AbstractEntity
{
        private int $user1Id;
        private int $user2Id;

        public function getUser1Id(): int
        {
            return $this->user1Id;
        }

        public function setUser1Id(int $user1Id): void 
        {
            $this->user1Id = $user1Id;
        }

        public function getUser2Id(): int
        {
            return $this->user2Id;
        }

        public function setUser2Id(int $user2Id): void
        {
            $this->user2Id = $user2Id;
        }
}