<?php


namespace App\Repository;


use App\Http\Entity\Navigation;

class NavigationRepository
{
    /**
     * @param $id
     * @param array $navigations
     */
    public function update($id, array $navigations): void
    {
        $nav = Navigation::whereSlug($id);
        $nav->position = $navigations['position'];
        $nav->parent = $navigations['parent'];

        $nav->update();
    }
}
