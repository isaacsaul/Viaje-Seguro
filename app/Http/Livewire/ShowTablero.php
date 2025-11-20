<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Chofer;
use App\Models\Infraccion;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ShowTablero extends Component
{
    public $search;
    public $sort = "id";
    public $direction = "desc";
    public $openConfirmationModal = false;
    public $email_sender = 'sindicatomixtosimonbolivar@gmail.com';
    public $email_token = 'cxkl bras kebv lszw';
    public $email_receiver;
    public $selectedInfraccion;

    protected $listeners = ['render', 'delete'];

    public function render()
    {
        $query = Infraccion::query()
            ->with(['chofer', 'sancion']); // Eager loading para mejor rendimiento

        // Búsqueda por CI del chofer
        if (trim($this->search) !== '') {
            $query->whereHas('chofer', function($q) {
                $q->where('ci', 'like', '%' . trim($this->search) . '%');
            });
        }

        $infracciones = $query->orderBy($this->sort, $this->direction)
                             ->get();

        return view('livewire.show-tablero', compact('infracciones'));
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function delete(Chofer $chofer)
    {
        $chofer->delete();
    }

    public function enviarCorreo($infraccionId)
    {
        $infraccion = Infraccion::with(['chofer', 'sancion'])->find($infraccionId);
        if (!$infraccion) {
            session()->flash('error', 'No se encontró la infracción');
            return;
        }

        $this->email_receiver = $infraccion->chofer->correo;
        $this->selectedInfraccion = $infraccionId;

        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Gmail
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $this->email_sender;
            $mail->Password = $this->email_token;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom($this->email_sender);
            $mail->addAddress($this->email_receiver);

            $mail->isHTML(true);
            $mail->Subject = 'Detalles del reporte';

            // Construir el cuerpo del correo
            $body = '<h2>Detalles del reporte</h2>';
            $body .= '<p>Fecha de Reporte: ' . $infraccion->fechainfraccion . '</p>';
            $body .= '<p>Estimado ' . $infraccion->chofer->nombres . ',</p>';
            $body .= '<p>Por medio de la presente, le notificamos que ha sido reportado por ' . $infraccion->tipoinfraccion . ' el día ' . $infraccion->fechainfraccion . '. Su caso actualmente se encuentra ' . $infraccion->estado . ' y se le ha aplicado ' . $infraccion->sancion->tiposancion . ' como sanción.</p>';
            $body .= '<p>Detalles del Reporte:</p>';
            $body .= '<ul>';
            $body .= '<li>Tipo de Infracción: ' . $infraccion->tipoinfraccion . '</li>';
            $body .= '<li>Fecha de Infracción: ' . $infraccion->fechainfraccion . '</li>';
            $body .= '<li>Estado: ' . $infraccion->estado . '</li>';
            $body .= '<li>Id de Sanción: ' . $infraccion->id_sancion . '</li>';
            $body .= '<li>Tipo de Sanción: ' . $infraccion->sancion->tiposancion . '</li>';
            $body .= '<li>Tipo de Sanción: ' . $infraccion->sancion->descripcion . '</li>';
            $body .= '</ul>';
            $body .= '<p>Atentamente,</p>';
            $body .= '<p>La Administración</p>';

            $mail->Body = $body;

            $mail->send();
            $this->openConfirmationModal = true;

        } catch (Exception $e) {
            session()->flash('error', 'Error al enviar el correo: ' . $mail->ErrorInfo);
        }
    }
}