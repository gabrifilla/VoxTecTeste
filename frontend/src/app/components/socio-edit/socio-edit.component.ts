import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-socio-edit',
  templateUrl: './socio-edit.component.html',
  styleUrls: ['./socio-edit.component.css'],
  standalone: true,
  imports: [CommonModule, FormsModule, NgbModule]
})
export class SocioEditComponent {
  constructor(
    public dialogRef: MatDialogRef<SocioEditComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any
  ) { }

  onNoClick(): void {
    this.dialogRef.close();
  }

  save(): void {
    // Lógica para salvar as alterações
    this.dialogRef.close(this.data);
  }
}
