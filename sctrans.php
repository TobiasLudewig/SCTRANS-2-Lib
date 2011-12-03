<?php
/**
 * ScTrans class
 * @author Tobias Ludewig <mail@tobias-ludewig.de>
 * @copyright (C) 2011  Tobias Ludewig

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

class ScTrans extends Connection
{
    /**
     * Returns a lists of exists djs
     * @return mixed
     */
    public function listDJ()
    {
        $arrParams = array();
        $arrParams['op'] = 'listdjs';
        $arrParams['seq'] =  $this->getSeq();
        return $this->request($arrParams);
    }

    /**
     * Add a DJ
     * @param $name
     * @param $pass
     * @param int $prio
     */
    public function addDJ($name, $pass, $prio = 100)
    {
        $arrParams = array();
        $arrParams['op'] = 'adddj';
        $arrParams['seq'] =  $this->getSeq();
        $arrParams['name'] =  $name;
        $arrParams['password'] =  $pass;
        $arrParams['priority'] =  $prio;
        return $this->request($arrParams);
    }

    /**
     * Delete a DJ
     * @param $name
     * @param $pass
     * @param int $prio
     */
    public function deleteDJ($name)
    {
        $arrParams = array();
        $arrParams['op'] = 'deletedj';
        $arrParams['seq'] =  $this->getSeq();
        $arrParams['name'] =  $name;
        return $this->request($arrParams);
    }
}
