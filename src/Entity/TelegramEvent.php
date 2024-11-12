<?php

namespace JustCommunication\TelegramBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

 /**
 * TelegramList
 * События, на которые могут подписываться подписчики телеграм канала
*/
 #[ORM\Entity()]
#[ORM\Table(name: 'telegram_event')]
#[ORM\UniqueConstraint(name: 'name', columns: ['name'])]


class TelegramEvent
{
    /**
     * @var int
     *
     */

    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(name:'id', type: 'integer',nullable: false)]
    private $id;

    /**
     * @var string
     *
     */

    #[ORM\Column(name: 'name', type: 'string', nullable: false)] 
    private $name;

    /**
     * @var string
     *
     */

    #[ORM\Column(name: 'note', type: 'text', length:65535, nullable: false)]
    private $note;


    /**
     * @var array
     * json array of roles camel-cased names
     *
     */
    #[ORM\Column(name: 'roles', type: 'json', nullable: false, options: ['default' => '[]'])]
    private $roles = array();

    //-------------------------------------------------------------------------------------------------

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote(string $note): self
    {
        $this->note = $note;
        return $this;
    }

    /**
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $roles
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }


    public function getRolesStr(): string
    {
        return json_encode($this->roles);
    }

    public function setRolesStr(string $roles): self
    {
        $this->roles = json_decode($roles??'[]');
        if (is_null($this->roles)){
            throw new \Exception('Wrong json format for field "roles" in '.__METHOD__);
        }
        return $this;
    }



}
