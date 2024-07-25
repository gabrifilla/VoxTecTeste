import { Component, Inject } from '@angular/core';
import { MAT_DIALOG_DATA, MatDialogRef } from '@angular/material/dialog';
import { CommonModule } from '@angular/common';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-empresa-edit',
  standalone: true,
  imports: [CommonModule, FormsModule, NgbModule],
  templateUrl: './empresa-edit.component.html',
  styleUrl: './empresa-edit.component.css'
})
export class EmpresaEditComponent {
  constructor(
    public dialogRef: MatDialogRef<EmpresaEditComponent>,
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
