<?php
namespace Thistle\App\Entity;

/**
 * @Entity
 * @Table(name="pages")
 */
class Page
{
	/**
	 * @Id
	 * @GeneratedValue
	 */
	private $id;

	/**
         * @var
         *
         * @Column(type="datetime")
         */
        private $created_at;

        /**
         * @var
         *
         * @Column(type="datetime")
         */
        private $updated_at;

        /**
         * @param mixed $id
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed $created_at
         */
        public function setCreatedAt($created_at)
        {
            $this->created_at = $created_at;
        }

        /**
         * @return mixed
         */
        public function getCreatedAt()
        {
            return $this->created_at;
        }

        /**
         * @param mixed $updated_at
         */
        public function setUpdatedAt($updated_at)
        {
            $this->updated_at = $updated_at;
        }

        /**
         * @return mixed
         */
        public function getUpdatedAt()
        {
            return $this->updated_at;
        }
}