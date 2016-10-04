<?php
namespace App\Model\Behavior;

use App\Smlovely\Shortener;
use Cake\Event\Event;
use Cake\ORM\Behavior;
use Cake\ORM\Entity;
use Cake\ORM\Table;

/**
 * Shortable behavior
 */
class ShortableBehavior extends Behavior
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function shorten(Entity $entity)
    {
        //i cant call component with behavior i think...
        // Lets Try
        // update model to load behavior
        $shortener = new Shortener();

        //Before save dont return ID because it wanst created yet.
        $entityID = $entity->get('id');

        $entity->set('shortened', $entityID);

    }

    public function afterSave(Event $event, Entity $entity)
    {
        $this->shorten($entity);
    }

    //lets try after save
}
