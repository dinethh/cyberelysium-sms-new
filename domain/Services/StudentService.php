<?php

namespace domain\Services;


use App\Models\Student;

class StudentService
{
    protected $student;

    public function __construct()
    {
        $this->student = new Student();
    }

    public function all()
    {
        return $this->student->all();
    }

    public function store($data)
    {
        return $this->student->create($data);
    }

    public function delete($student_Id)
    {
        $stu = $this->student->find($student_Id);
        $stu->delete();
    }

    public function status($studentId)
    {
        $stu = $this->student->find($studentId);
        $stu->status = $stu->status == 1 ? 0 : 1;
        $stu->save();
    }

    public function save($data, $imagePath)
    {
        if ($imagePath) {
            $data['image'] = $imagePath;
        }

        return $this->student->create($data);
    }

    public function update(array $data, $studentId)
    {
        $stu = $this->student->find($studentId);
        $stu->update($this->edit($stu, $data));
    }

    public function edit(Student $stu, $data)
    {
        return array_merge($stu->toArray(), $data);
    }

    public function get($id)
    {
        return $this->student->find($id);
    }
}
