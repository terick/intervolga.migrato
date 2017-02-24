<?namespace Intervolga\Migrato\Tool\XmlIdProvider;

use Intervolga\Migrato\Data\BaseData;
use Intervolga\Migrato\Data\RecordId;

abstract class BaseXmlIdProvider
{
	protected $dataClass = null;
	public function __construct(BaseData $dataClass)
	{
		$this->dataClass = $dataClass;
	}

	/**
	 * @param \Intervolga\Migrato\Data\RecordId $id
	 * @param string $xmlId
	 */
	abstract public function setXmlId($id, $xmlId);

	/**
	 * @param RecordId $id
	 *
	 * @return string
	 */
	abstract public function getXmlId($id);

	/**
	 * @return bool
	 */
	public function isXmlIdFieldExists()
	{
		return true;
	}

	/**
	 * @return bool
	 */
	public function createXmlIdField()
	{
		return true;
	}

	/**
	 * @param \Intervolga\Migrato\Data\RecordId $id
	 *
	 * @return bool
	 */
	public function generateXmlId($id)
	{
		return $this->setXmlId($id, $this->makeXmlId());
	}

	/**
	 * @return string
	 */
	public static function makeXmlId()
	{
		$xmlid = uniqid("", true);
		$xmlid = str_replace(".", "", $xmlid);
		$xmlid = str_split($xmlid, 6);
		$xmlid = implode("-", $xmlid);
		return $xmlid;
	}
}