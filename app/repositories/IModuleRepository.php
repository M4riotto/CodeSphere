<?php
interface IModuleRepository {
  public function create(int $courseId, ModuleEntity $module): int;
}
