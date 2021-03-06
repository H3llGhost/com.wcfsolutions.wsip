<?php
// wsip imports
require_once(WSIP_DIR.'lib/data/publication/object/comment/PublicationObjectCommentNotificationObject.class.php');

// wcf imports
require_once(WCF_DIR.'lib/data/user/notification/object/AbstractNotificationObjectType.class.php');

/**
 * An implementation of NotificationObject to support the usage of a comment as a notification object.
 * 
 * @author	Sebastian Oettl
 * @copyright	2009-2011 WCF Solutions <http://www.wcfsolutions.com/index.html>
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.wcfsolutions.wsip.notification
 * @subpackage	data.publication.object.comment
 * @category	Infinite Portal
 */
class PublicationObjectCommentNotificationObjectType extends AbstractNotificationObjectType {
        /**
         * @see NotificationObjectType::getObjectByID()
         */
        public function getObjectByID($objectID) {
                // get object
                $comment = new PublicationObjectCommentNotificationObject($objectID);
                if (!$comment->commentID) return null;
		
                // return object
                return $comment;
        }
	
        /**
         * @see NotificationObjectType::getObjectByObject()
         */
        public function getObjectByObject($object) {
                // build object using its data array
                $comment = new PublicationObjectCommentNotificationObject(null, $object);
                if (!$comment->commentID) return null;
		
                // return object
                return $comment;
        }
	
        /**
         * @see NotificationObjectType::getObjectsByIDArray()
         */
        public function getObjectsByIDArray($objectIDArray) {
                $comments = array();
                $sql = "SELECT		*
			FROM 		wsip".WSIP_N."_publication_object_comment
			WHERE 		commentID IN (".implode(',', $objectIDArray).")";
                $result = WCF::getDB()->sendQuery($sql);
                while ($row = WCF::getDB()->fetchArray($result)) {
                        $comments[$row['commentID']] = new PublicationObjectCommentNotificationObject(null, $row);
                }
		
                return $comments;
        }
	
        /**
         * @see NotificationObjectType::getPackageID()
         */
        public function getPackageID() {
                return PACKAGE_ID;
        }
}
?>